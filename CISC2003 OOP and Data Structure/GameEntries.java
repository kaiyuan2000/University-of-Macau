

public class GameEntries{

    public class GameEntry{
        //variable for Node Class
        private String name;
        private int score;
        private GameEntry prev;
        private GameEntry next;
        //constructor
        public GameEntry (String n, int s){
            this (n,s,null,null);
        }
        public GameEntry (String n, int s, GameEntry p, GameEntry ne){
            name = n;
            score = s;
            prev = p;
            next = ne;
        }
        //method of Class Node
        public String getName(){return name;}
        public int getScore(){return score;}
        public String toString(){
            return "(" + name + "," +score + ")";
        }
        public GameEntry getPrev(){return prev;}
        public GameEntry getNext(){return next;}
        public void setName(String n) {name = n ;}
        public void setScore(int s) {score = s ;}
        public void setPrev(GameEntry p) {prev = p ;}
        public void setNext(GameEntry n) {next = n ;}
    }

    //variable for Doubly Linked List Class
    private GameEntry header;
    private GameEntry trailer;
    public int size = 0;
    final int MAX = 10;

    //Constructor
    public GameEntries(){
        header = new GameEntry(null,999999,null,null);
        trailer = new GameEntry(null,0, header,null);
        header.setNext(trailer);
    }

    //Public methods
    public int size(){return size;}

    //type in name & score to add into the score board
    public void add(String name, int score){
        GameEntry newest = new GameEntry(name,score,null,null);
        if (size ==0){
            newest.setPrev(header);
            header.setNext(newest);
            newest.setNext(trailer);
            trailer.setPrev(newest);
            size++;
        }
        else if (0 < size && size < MAX ){
            size++ ;
            GameEntry ori = trailer.getPrev();
            newest.setNext(ori.getNext());
            newest.setPrev(ori);
            ori.getNext().setPrev(newest);
            ori.setNext(newest);
            compare(newest,ori);
        }
        else {
            GameEntry ori = trailer.getPrev();
            newest.setNext(ori.getNext());
            newest.setPrev(ori);
            ori.getNext().setPrev(newest);
            ori.setNext(newest);
            compare(newest,ori);
            removeLast();
        }

    }

    //type in the ranking to remove
    public void remove(int ranking){
        GameEntry remove = header ;
        if (size <= 0) {
            System.out.println("Invalid Input");
        }
        for (int i=0; i<ranking; i++ ){
            remove = remove.getNext();
        }
        GameEntry predecessor = remove.getPrev() ;
        GameEntry successor = remove.getNext() ;
        predecessor.setNext(successor);
        successor.setPrev(predecessor);
        System.out.println("Successfully remove" + remove);
        size--;
    }

    //print out the whole table of Game Entries
    public void printOut(){
        if (size <= 0) {
            System.out.println("end");
    }
        else {
            GameEntry initial = header.getNext();
            for (int i=0; i<size; i++) {
                System.out.println(initial);
                initial = initial.getNext();
            }
        }
    }

    //Private Method
    private void compare (GameEntry newest, GameEntry ori) {

        if (newest.getScore() > ori.getScore()){
            String tempName = ori.name;
            int tempScore = ori.score;
            ori.setName(newest.name);
            ori.setScore(newest.score);
            newest.setName(tempName);
            newest.setScore(tempScore);
            compare(ori, ori.getPrev());

        }

    }

    private void removeLast(){
        GameEntry Last = trailer.getPrev();
        GameEntry predecessor = Last.getPrev() ;
        GameEntry successor = Last.getNext() ;
        predecessor.setNext(successor);
        successor.setPrev(predecessor);
    }


    //Main Method
    public static void  main(String[] args){
        GameEntries scoreboard = new GameEntries();   //make a scoreboard

        System.out.println("Adding 10 Scores ....");
        //ADD 10 SCORES
        scoreboard.add("Catty",50);

        scoreboard.add("Alex",100);
        scoreboard.add("Bob",120);
        scoreboard.add("Zane",99);
        scoreboard.add("Lop",20);
        scoreboard.add("Queen",50);
        scoreboard.add("Fun",80);
        scoreboard.add("Web",95);
        scoreboard.add("Nop",15);

        scoreboard.add("King",150);
        //print out GameEntries
        System.out.println("Below is the scoreboard : ");
        scoreboard.printOut();
        //add more than 10 SCORES
        System.out.println("Try to add more scores ... ");
        scoreboard.add("MAX",200);
        System.out.println("Print out scoreboard again : ");
        scoreboard.printOut();
        //remove method
        System.out.println("Trying to remove ranking 5");
        scoreboard.remove(5);
        System.out.println("Print out scoreboard again :");
        scoreboard.printOut();


    }
}





