package main

import (
	"log"
	"net/http"
)

func main() {
	http.HandleFunc("/", helloMessage)
	http.HandleFunc("/tasks", taskHandler)

	log.Println("Running at port :8080....")
	log.Fatal(http.ListenAndServe(":8080", nil))
}
