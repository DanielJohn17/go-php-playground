package main

import "fmt"

func main() {

	menu := map[string]float64{
		"soup":  4.99,
		"pie":   7.99,
		"salad": 6.99,
	}

	phonebook := map[int]string{
		1: "John",
		2: "Jane",
		3: "Doe",
		4: "Smith",
	}

	fmt.Println(menu)
	fmt.Println(menu["pie"])

	// looping maps
	fmt.Println("Looping maps")
	for key, value := range menu {
		fmt.Println(key, "-", value)
	}

	fmt.Println()

	fmt.Println(phonebook)
	fmt.Println(phonebook[1])

	fmt.Println("Looping phonebook")
	for key, value := range phonebook {
		fmt.Println(key, "-", value)
	}

	phonebook[5] = "Doe"
	phonebook[4] = "Daniel"

	fmt.Println()
	fmt.Println(phonebook)
}
