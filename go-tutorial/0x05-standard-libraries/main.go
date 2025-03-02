package main

import (
	"fmt"
	"sort"
	"strings"
)

func main() {

	gretings := "Hello World!"
  ages := []int{45, 30, 25, 20, 75, 50, 65, 60}
  names := []string{"John", "Peter", "Robert", "Alice", "Bob"}

	fmt.Println(strings.Contains(gretings, "Hello")) // true
  fmt.Println(strings.Contains(gretings, "hello")) // false

  fmt.Println(strings.ReplaceAll(gretings, "Hello", "Hi")) // Hi World!
  fmt.Println(strings.ToUpper(gretings)) // HELLO WORLD!

  fmt.Println(strings.Index(gretings, "ll")) // 2
  fmt.Println(strings.Split(gretings, " ")) // [Hello World!]


  fmt.Println(sort.IntsAreSorted(ages)) // false

  sort.Ints(ages)

  fmt.Println(sort.IntsAreSorted(ages)) // true
  fmt.Println(ages) // [20 25 30 45 50 60 65 75]

  index := sort.SearchInts(ages, 30)

  fmt.Println(index) // 2

  sort.Strings(names)

  fmt.Println(names) // [Alice Bob John Peter Robert]

  fmt.Println(sort.SearchStrings(names, "Peter")) // 3


}
