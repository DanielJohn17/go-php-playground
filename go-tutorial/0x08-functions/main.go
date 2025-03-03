package main

import (
	"fmt"
	"math"
)

func sayGreetings(n string) {
	fmt.Printf("Good morning %v \n", n)
}

func sayBye(n string) {
	fmt.Printf("Goodbye %v \n", n)
}

func cycleNames(n []string, f func(string)) {
	for _, value := range n {
		f(value)
	}
}

func circleArea(r float64) float64 {
	return math.Pi * r * r
}

func main() {
	/* sayGreetings("Daniel") */
	/* sayGreetings("Nati") */
	/**/
	/* sayBye("Daniel") */
	/* sayBye("Nati") */

	// cycleNames
	cycleNames([]string{"Daniel", "Nati", "John"}, sayGreetings)
	cycleNames([]string{"Daniel", "Nati", "John"}, sayBye)

	a1 := circleArea(10.5)
	a2 := circleArea(15)

	fmt.Printf("Circle 1 area is %0.1f and circle 2 area is %0.1f\n", a1, a2)
}
