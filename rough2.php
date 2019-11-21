<?php


class Queue { 
   

	// Method to add an key to the queue. 
	public function enqueue($key) 
	{ 
		if (this.rear == null) { 
			this.front = this.rear = temp; 
			return; 
		} 

		// Add the new node at the end of queue and change rear 
		this.rear.next = temp; 
		this.rear = temp; 
	} 

	// Method to remove an key from queue. 
	QNode dequeue() 
	{ 
		// If queue is empty, return NULL. 
		if (this.front == null) 
			return null; 

		// Store previous front and move front one node ahead 
		QNode temp = this.front; 
		this.front = this.front.next; 

		// If front becomes NULL, then change rear also as NULL 
		if (this.front == null) 
			this.rear = null; 
		return temp; 
	} 
} 

// Driver class 
public class Test { 
	public static void main(String[] args) 
	{ 
		Queue q = new Queue(); 
		q.enqueue(10); 
		q.enqueue(20); 
		q.dequeue(); 
		q.dequeue(); 
		q.enqueue(30); 
		q.enqueue(40); 
		q.enqueue(50); 

		System.out.println("Dequeued item is " + q.dequeue().key); 
	} 
} 
// This code is contributed by Gaurav Miglani 
