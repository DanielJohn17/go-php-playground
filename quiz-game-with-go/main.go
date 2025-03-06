package main

import "fmt"

func main() {
	fmt.Println("Welcome to my quiz game!")
	var name string
	fmt.Scan(&name)

	fmt.Printf("Hello, %v, welcome to the game!\n", name)

	fmt.Printf("Enter your age: ")
	var age uint
	fmt.Scan(&age)

	if age >= 10 {
		fmt.Println("Yay you can play!")
	} else {
		fmt.Println("Sorry, you are too young to play!")
    return
	}

}
