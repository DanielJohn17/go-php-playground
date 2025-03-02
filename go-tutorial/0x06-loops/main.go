package main

import "fmt"

func main() {
	fmt.Println("Loops in Go")

	names := []string{"Daniel", "Nati", "John", "Doe", "Alex"}

	/* x := 0 */
	/**/
	/* for x < 5 { */
	/*   fmt.Println("Value of x is: ", x) */
	/*   x++ */
	/* } */

	/* for i := 0; i < 5; i++ { */
	/*   fmt.Println("Value of x is:", i) */
	/* } */

	/* for i:=0; i < len(names); i++ { */
	/*   fmt.Println("Name is: ", names[i]) */
	/* } */

	for index, value := range names {
		fmt.Printf("Index is: %v and Value is: %v\n", index, value)
	}

	fmt.Println("\nEnd of the program")
	fmt.Println()

	for _, value := range names {
		fmt.Println("Value is: ", value)
		value = "New Value" // This will not change the value in the array
	}

	fmt.Println()
	fmt.Println(names) // The array is not changed

}
