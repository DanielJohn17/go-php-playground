package main

import "fmt"

func main() {
	age := 21
	name := "Daniel"

	// Print
	fmt.Print("Hello, ")
	fmt.Print("World!\n")

	// Println
	fmt.Println("Hello! my name is", name, "and I am", age, "years old.")

	// Printf
	fmt.Printf("Hello! my name is %s and I am %d years old.\n", name, age)
	fmt.Printf("Age is type of %T\n", age)
	fmt.Printf("You scored %f points!\n", 225.55)
	fmt.Printf("You scored %0.1f points!\n", 225.55)

	// Sprintf
	message := fmt.Sprintf("Hello! my name is %s and I am %d years old.\n", name, age)
	fmt.Println("The saved message is:", message)
}
