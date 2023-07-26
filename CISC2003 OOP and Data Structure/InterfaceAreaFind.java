import org.w3c.dom.ls.LSOutput;
import java.lang.Math.*;
import java.util.*;

interface Area {
    double area (double a, double b);
    String getName() ;
}

class Rectangle implements Area {
    public double area (double a, double b){
        return (a*b);
    }
    public String getName() {
        return " Rectangle ";
    }
}

class Circle implements Area {

    public double area (double a, double b){
        return (Math.PI*a*b);
    }
    public String getName() {
        return " Circle ";
    }
}

public class InterfaceAreaFind {
    public static void main(String[] args) {

        //get input from user
        Scanner sc =new Scanner(System.in);
        System.out.println("This is calculator to find area of circle & rectangle using interface. ");
        System.out.print("Enter length of Rectangle : ");
        double length = sc.nextDouble();
        System.out.print("Enter width of Rectangle : ");
        double width = sc.nextDouble();
        System.out.print("Enter radius of Circle : ");
        double radius = sc.nextDouble();

        //calculating
        Area rectangle = new Rectangle();
        double recArea = rectangle.area(length,width);
        System.out.println(rectangle.getName() + "has the area of : " + recArea);

        Area circle = new Circle();
        double cirArea = circle.area(radius,radius);
        System.out.println(circle.getName() + "has the area of : " + cirArea);

    }
}
