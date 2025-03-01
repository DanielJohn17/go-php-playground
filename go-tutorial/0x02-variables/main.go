package main

import "fmt"

func main() {

	// strings
	fmt.Println("Strings")

	var nameOne string = "mario"
	var nameTwo = "luigi"
	var nameThree string

	fmt.Println(nameOne, nameTwo, nameThree)

	nameOne = "peach"
	nameThree = "bowser"

	fmt.Println(nameOne, nameTwo, nameThree)

	nameFour := "yoshi"

	fmt.Println(nameFour)

	// ints
	fmt.Println("\nIntegers")

	var ageOne int = 20
	var ageTwo = 30
	ageThree := 40

  fmt.Println(ageOne, ageTwo, ageThree)

  // bits & memory
  fmt.Println("\nBits & Memory")
  var numOne int8 = 25
  var numTwo int8 = -128
  var numThree uint8 = 255

  fmt.Println(numOne, numTwo, numThree)

  // floats
  fmt.Println("\nFloats")
  var scoreOne float32 = 25.98
  var scoreTwo float64 = 25.987654321
  scoreThree := 1.59

  fmt.Println(scoreOne, scoreTwo, scoreThree)


}
