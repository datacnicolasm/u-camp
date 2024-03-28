import './bootstrap';

// Importación del archivo other.js
import { Rectangle } from './other';

// Arrow function
const greet = (name) => {
    console.log(`Hello, ${name}!`);
};

greet('John');

// Template literals
const firstName = 'Jane';
const lastName = 'Doe';
console.log(`Full name: ${firstName} ${lastName}`);

// Destructuring assignment
const person = { name: 'Alice', age: 30 };
const { name, age } = person;
console.log(`Name: ${name}, Age: ${age}`);

// Spread operator
const arr1 = [1, 2, 3];
const arr2 = [4, 5, 6];
const combined = [...arr1, ...arr2];
console.log('Combined array:', combined);

// Instancia de la clase Rectangle definida en other.js
const rectangle = new Rectangle(5, 10);
console.log('Rectangle area:', rectangle.area());
