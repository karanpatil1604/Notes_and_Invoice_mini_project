// class Mammal {
//     public String name;
//     public int lifespan;

//     public Mammal() {
//         name = "Tiger";
//         lifespan = 45;
//     }

//     public void show() {
//         System.out.format("name = %s : lifespan = %d", name, lifespan);
//     }

//     public void display() {
//         System.out.println("Mammal details");
//     }
// }

// class Endangered extends Mammal {
//     public boolean endanger_status;

//     public Endangered() {
//         endanger_status = false;
//     }

//     public void show() {
//         System.out.println("endanger status of " +
//                 this.name + " is " + endanger_status);
//     }

//     public void display(String species) {
//         System.out.println("Endanger status");
//     }
// }

// public class FClass {
//     public static void main(String args[]) {
//         Mammal m1 = new Endangered();
//         m1.show();
//         m1.display();
//     }
// }

// class Bird {
//     public void fly() {
//         System.out.println("it can fly");
//     }
// }

// class Duck extends Bird {
//     public void swim() {
//         System.out.println("it can swim");
//     }
// }

// public class FClass {
//     public static void doIt(Bird b) {
//         b.fly();
//         if (b instanceof Duck)
//             ((Duck) b).swim();

//     }

//     public static void main(String[] args) {
//         Duck d = new Duck();
//         doIt(d);
//     }
// }

class Shape {
    public void area() {
        System.out.println("area is unknown");
    }

    public void volume() {
        System.out.println("volume is unknown");
    }
}

class Rectangle extends Shape {
    public void area() {
        System.out.println("area of Rectangle");
    }
}

class Cube extends Shape {
    public void area() {
        System.out.println("area of Cube");
    }

    public void volume() {
        System.out.println("volume of Cube");
    }
}

public class FClass {
    public static void compute(Shape s) {
        s.area();
        s.volume();
    }

    public static void main(String[] args) {
        Rectangle r = new Rectangle();
        Cube c = new Cube();
        compute(r);
        compute(c);
    }
}