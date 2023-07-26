import java.util.*;

abstract class Areaa {
    double area(double a, double b, int c) {
        if (c==0) {
            return (Math.PI*a*b);
        }
        else if (c==1){
            return (a*b);
        }
        else {return 0;}
    }
    abstract String getName() ;
}

class Rectanglee extends Areaa {
    public String getName() {
        return " Rectangle ";
    }
}

class Circlee extends Areaa {
    public String getName() {
        return " Circle ";
    }
}

public class AbstractAreaFind {
    public static void main(String[] args) {

        //get input from user
        Scanner sc =new Scanner(System.in);
        System.out.println("This is calculator to find area of circle & rectangle using abstract. ");
        System.out.print("Type 1 to calculate rectangle area, while 0 for circle : ");

        int c = sc.nextInt();

        if (c==0) {
            System.out.print("Enter radius of Circle : ");
            double radius = sc.nextDouble();

            Areaa circle = new Circlee();
            double cirArea = circle.area(radius,radius,c);
            System.out.println(circle.getName() + "has the area of : " + cirArea);
        }

        else if (c==1) {
            System.out.print("Enter length of Rectangle : ");
            double length = sc.nextDouble();
            System.out.print("Enter width of Rectangle : ");
            double width = sc.nextDouble();

            Areaa rectangle = new Rectanglee();
            double recArea = rectangle.area(length,width,c);
            System.out.println(rectangle.getName() + "has the area of : " + recArea);}

        else {
            System.out.println("Invalid number.");
        }

    }

}
