package main

import "fmt"

func updateName(name string) {
	name = "David"
}

func updateMenu(m map[string]float64) {
  m["coffee"] = 2.99
}

func main() {

	// Group A -> ints, floats, strings, bools, arrays, structs
	name := "John"

	updateName(name)

	fmt.Println(name) // name is still John

	// Group B -> slices, maps, functions
	menu := map[string]float64{
		"pie":       5.95,
		"ice cream": 3.99,
		"coffee":    4.99,
	}

  updateMenu(menu)

  fmt.Println(menu) // Coffee value changed
}
