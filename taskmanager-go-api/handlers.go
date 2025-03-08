package main

import (
	"encoding/json"
	"net/http"
)

func helloMessage(res http.ResponseWriter, req *http.Request) {
	res.Header().Set("Content-Type", "application/json")
	res.WriteHeader(http.StatusOK)
	res.Write([]byte(`{"message": "Hello, World!"}`))
}

func taskHandler(res http.ResponseWriter, req *http.Request) {
	res.Header().Set("Content-Type", "application/json")

	switch req.Method {
	case "GET":
		getTasks(res, req)
	case "PATCH":
		updateTask(res, req)
	default:
		http.Error(res, "Method not allowed", http.StatusMethodNotAllowed)
	}
}

func getTasks(res http.ResponseWriter, req *http.Request) {
	id := req.URL.Query().Get("id")

	if id != "" {
		task, ok := database[id]

		if !ok {
			res.WriteHeader(http.StatusNotFound)
			res.Write([]byte(`{"error": "Task not found"}`))
			return
		}

		data, err := json.Marshal(task)

		if err != nil {
			res.WriteHeader(http.StatusInternalServerError)
			res.Write([]byte(`{"error": "Error marshalling the task"}`))
			return
		}

		res.WriteHeader(http.StatusOK)
		res.Write(data)
		return
	}

	data, err := json.Marshal(database)

	if err != nil {
		res.WriteHeader(http.StatusInternalServerError)
		res.Write([]byte(`{"error": "Error marshalling the tasks"}`))
		return
	}

	res.WriteHeader(http.StatusOK)
	res.Write(data)
}

func updateTask(res http.ResponseWriter, req *http.Request) {
	id := req.URL.Query().Get("id")
	task, ok := database[id]

	if !ok || id == "" {
		http.Error(res, "Forbidden", http.StatusForbidden)
		return
	}

	var payloadData Task
	if err := json.NewDecoder(req.Body).Decode(&payloadData); err != nil {
		http.Error(res, "Invalid JSON", http.StatusBadRequest)
		return
	}
	defer req.Body.Close()

	// Update task
	task.Name = payloadData.Name

	database[id] = task
	res.WriteHeader(http.StatusOK)
}
