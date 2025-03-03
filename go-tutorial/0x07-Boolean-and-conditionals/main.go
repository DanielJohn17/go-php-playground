package main

import "fmt"

func main() {
	age := 45
	names := []string{"John", "Jane", "Joe", "Jack", "Jill"}

	if age < 30 {
		fmt.Println("Age is less than 30")
	} else if age < 40 {
		fmt.Println("Age is less than 40")
	} else {
		fmt.Println("Age is 40 or more")
	}

	for index, value := range names {
		if index == 1 {
			fmt.Println("Continuing at pos", index)
			continue
		}

		if index > 2 {
			fmt.Println("Breaking at pos", index)
			break
		}

		fmt.Printf("The value at position %v is %v\n", index, value)
	}

}
