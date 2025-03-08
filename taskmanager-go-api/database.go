package main

type Task struct {
	ID   int    `json:"id"`
	Name string `json:"name"`
}

var database = map[string]Task{
	"1": {ID: 1, Name: "Task 1"},
	"2": {ID: 2, Name: "Task 2"},
	"3": {ID: 3, Name: "Task 3"},
	"4": {ID: 4, Name: "Task 4"},
}
