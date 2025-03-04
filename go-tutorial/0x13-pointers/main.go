package main

import "fmt"

func updateName(n *string) {
  *n = "Nati"
}

func main() {

	name := "Daniel"

	fmt.Println("Memory address of variable 'name' is", &name)

	m := &name

	fmt.Println("Memory address:", m)
	fmt.Printf("Vlue at memory address %p is %s\n", m, *m)

  updateName(m)

  fmt.Printf("Updated name at address %p is %s\n", m, *m)
}
