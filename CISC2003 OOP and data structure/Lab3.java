 class A {
    protected int x = 1;
    public void setIt (int y){x = y;}
    public int getIt() {return x ;}
}

class B extends A {
    //for B
    protected int x =2;
    public void setIt (int y) {x = y;}
    public int getIt() {return x;};
    //for A
    public void superSetIt(int y) {super.x = y;}
    public int superGetIt() {return super.x ;}

}

public class C extends B {
    //for C
    protected int x =3;
    public void setIt(int y) {x=y;}
    public int getIt() {return x;}
    //for B
    public void superSetIt (int y){ super.x = y ;}
    public int superGetIt() {return super.x ;}
    //for C
    public void superduperSetIt(int y) {super.superSetIt(y);}
    public int superduperSetIt() {return super.superGetIt();}

    //main method
    public static void main(String[] args){
        C c = new C();
        System.out.println("C's is " + c.getIt());
        System.out.println("B's is " + c.superGetIt());
        System.out.println("A's is " + c.superduperSetIt());
        //set number
        System.out.println("Only change A to 4, without changing B & C");
        c.superduperSetIt(4);
        System.out.println("C's is " + c.getIt());
        System.out.println("B's is " + c.superGetIt());
        System.out.println("A's is " + c.superduperSetIt());


    }

}
