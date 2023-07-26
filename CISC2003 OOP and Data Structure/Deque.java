public class Deque {

    private static class Node {
        private int element;
        private Node prev;
        private Node next;
        public Node (int e, Node p, Node n){
            element = e;
            prev = p;
            next = n;
        }
        public int getElement() {return element;}
        public Node  getPrev() {return prev;}
        public Node  getNext() {return next;}
        public void setPrev(Node p) {prev = p;}
        public void setNext(Node n) {next = n;}
    }

    private Node header;
    private Node trailer;
    private int size = 0;

    public Deque() {
        header = new Node (-99,null,null);
        trailer = new Node (-99, header,null);
        header.setNext(trailer);
    }

    public int size() {return size;}
    public boolean isEmpty() {return size ==0;}
    public int first(){
        if (isEmpty()) return -1;
        return header.getNext().getElement();
    }
    public int last() {
        if (isEmpty()) return -1;
        return trailer.getPrev().getElement();
    }

    public void addFirst(int e){
        addBetween(e, header, header.getNext());
    }
    public void enqueue(int e){
        addBetween(e, trailer.getPrev(), trailer);
    }
    public int dequeue(){
        if (isEmpty()) return -1;
        return remove(header.getNext());
    }
    public int removeLast() {
        if (isEmpty()) return -1;
        return remove(trailer.getPrev());
    }
    private void addBetween(int e, Node predecessor, Node successor) {
        Node  newest = new Node (e, predecessor, successor);
        predecessor.setNext(newest);
        successor.setPrev(newest);
        size++;
    }
    private int remove(Node node){
        Node predecessor = node.getPrev();
        Node successor = node.getNext();
        predecessor.setNext(successor);
        successor.setPrev(predecessor);
        size--;
        return node.getElement();
    }

    public void printNodes() {
        //Node current will point to head
        Deque.Node current = header.getNext();
        if (header == null) {
            System.out.println("Doubly linked list is empty");
            return;
        }
        System.out.println("\n Nodes of doubly linked list: ");
        while (current != trailer) {
            //Print each node and then go to next.
            System.out.print(current.element + " ");
            current = current.next;
        }
    }

    public static void main(String[] args) {
        Deque doublyqueueD = new Deque();
        Deque doublyqueueQ = new Deque();

        //fill in D with 1...8//
        doublyqueueD.enqueue(1);
        doublyqueueD.enqueue(2);
        doublyqueueD.enqueue(3);
        doublyqueueD.enqueue(4);
        doublyqueueD.enqueue(5);
        doublyqueueD.enqueue(6);
        doublyqueueD.enqueue(7);
        doublyqueueD.enqueue(8);
        doublyqueueD.printNodes();
        //insert 1-4 at the back//
        doublyqueueD.enqueue(doublyqueueD.dequeue());
        doublyqueueD.enqueue(doublyqueueD.dequeue());
        doublyqueueD.enqueue(doublyqueueD.dequeue());
        doublyqueueD.enqueue(doublyqueueD.dequeue());

        //insert 5 at Q, then insert 4 at Q//
        doublyqueueQ.enqueue(doublyqueueD.dequeue());
        doublyqueueQ.enqueue(doublyqueueD.removeLast());

        //insert back 5 & 4 to D//
        doublyqueueD.enqueue(doublyqueueQ.dequeue());
        doublyqueueD.enqueue(doublyqueueQ.dequeue());

        //insert 6,7,8 to D//
        doublyqueueD.enqueue(doublyqueueD.dequeue());
        doublyqueueD.enqueue(doublyqueueD.dequeue());
        doublyqueueD.enqueue(doublyqueueD.dequeue());

        doublyqueueD.printNodes();

    }

}
