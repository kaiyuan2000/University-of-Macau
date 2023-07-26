import javax.print.attribute.IntegerSyntax;

public class CircularLinkedList  {

    private static class Node  {
        //variable
        private int element;
        private Node next;
        //constructor
        public Node (int e, Node n){
            element = e;
            next = n;
        }
        //method in Node class
        public int getElement(){ return element;}
        public Node getNext() {return next;}
        public void setNext (Node n) { next = n ;}
    }
    //variable
    private Node head = null;
    private Node tail = null;
    private int size =0 ;
    //constructor
    public CircularLinkedList() {}
    //access method
    public int size() {return size;}

    //update method
    public void add(int e) {
        Node newest = new Node(e,null);
        if (head ==null){
            head = newest;
            tail = newest;
            newest.next = head;
        }
        else {
            tail.next = newest;
            tail = newest;
            tail.next = head;
        }
        size++;
    }

    public void display() {
        Node n = head;
        if (size == 0) {
            System.out.println("List is empty");
        } else {
            do {
                System.out.println(n.element);
                n = n.next;
            }
            while (n != head);
        }
    }

    public void reverse(Node current) {
        if(current.next == head) {
            System.out.println(current.element);
            return;
        }
        //Recursively calls the reverse function
        reverse(current.next);
        System.out.println(current.element);
    }

    public static void main (String[] args){
        CircularLinkedList CLL = new CircularLinkedList();
        CLL.add(4);
        CLL.add(3);
        CLL.add(2);
        CLL.add(1);
        System.out.println("Original List : ");
        CLL.display();
        System.out.println("Reversed list : ");
        CLL.reverse(CLL.head);

    }




}
