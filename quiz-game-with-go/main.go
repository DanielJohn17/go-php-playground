package main

import (
	"bufio"
	"fmt"
	"os"
	"strconv"
	"strings"
)

func getInput() (string, error) {
	reader := bufio.NewReader(os.Stdin)
	input, error := reader.ReadString('\n')

	return strings.TrimSpace(input), error
}

func main() {
	score := 0

	fmt.Printf("Welcome to my quiz game! What is your name? ")
	name, _ := getInput()

	fmt.Printf("Hello, %v, welcome to the game!\n", name)

	fmt.Printf("Enter your age: ")
	age_str, _ := getInput()
	age, error := strconv.ParseInt(age_str, 10, 0)

	if error != nil {
		fmt.Println("Please enter a number")
		return
	}
	if age >= 10 {
		fmt.Println("Yay you can play!")
	} else {
		fmt.Println("Sorry, you are too young to play!")
		return
	}

	fmt.Printf("What is better, the RTX 3080 or RTX 3090? ")
	answer, _ := getInput()

	if strings.ToUpper(answer) == "RTX 3090" {
		fmt.Println("Correct!")
		score += 1
	} else {
		fmt.Println("Wrong!")
	}

	fmt.Printf("How many cores does the Ryzen 9 3900x have? ")
	cores_str, _ := getInput()
	cors, error := strconv.ParseInt(cores_str, 10, 0)

	if error != nil {
		fmt.Println("Please enter a number")
		return
	}

	if cors == 12 {
		fmt.Println("Correct!")
		score += 1
	} else {
		fmt.Println("Wrong!")
	}

	fmt.Printf("Your score is %v out of %v\n", score, 2)
}
