/*double linked list rotating*/

public class RotateDoubly {

        //A node class for doubly linked list
        class Node{
            int item;
            Node previous;
            Node next;

            public Node(int item) {
                this.item = item;
            }
            public Node getPrev(){return previous;}
            public Node getNext(){return next;}
            public void setPrev(Node p) {previous = p ;}
            public void setNext(Node n) {next = n ;}
        }
        //Initially, heade and tail is set to null
        Node head, tail = null;

        //add a node to the list
        public void addNode(int item) {
            //Create a new node
            Node newNode = new Node(item);

            //if list is empty, head and tail points to newNode
            if(head == null) {
                head = tail = newNode;
                //head's previous will be null
                head.previous = null;
                //tail's next will be null
                tail.next = null;
            }
            else {
                //add newNode to the end of list. tail->next set to newNode
                tail.next = newNode;
                //newNode->previous set to tail
                newNode.previous = tail;
                //newNode becomes new tail
                tail = newNode;
                //tail's next point to null
                tail.next = null;
            }
        }

        //print all the nodes of doubly linked list
        public void printNodes() {
            //Node current will point to head
            Node current = head;
            if (head == null) {
                System.out.println("Doubly linked list is empty");
                return;
            }
            System.out.println("Nodes of doubly linked list: ");
            while (current != null) {
                //Print each node and then go to next.
                System.out.print(current.item + " ");
                current = current.next;
            }
        }



        public void rotate(int number) {
            int counter = countNode();
            if (counter == 0) {
                System.out.println("List is empty, nothing to rotate.");
            }
            else {
                while (number > 0) {
                    Node current = head;
                    head = current.getNext();
                    head.setPrev(null);
                    tail.setNext(current);
                    current.setPrev(tail);
                    tail = current;
                    current.setNext(null);
                    number--;
                }
        }
        }

        public int countNode() {
         int counter = 0;
         Node current = head;
         while (current != null){
            counter++;
            current = current.getNext();
        }
        return counter;
    }




    public static void  main(String[] args){
            RotateDoubly rList = new RotateDoubly();

        rList.addNode(1);
        rList.addNode(2);
        rList.addNode(3);
        rList.addNode(4);
        rList.addNode(5);
        rList.printNodes();
        rList.rotate(3);
        rList.printNodes();



    }

}
