class A {
    public void display() {
        System.out.print("Hii ");
    }
}

public class B extends A {
    public void display(String s) {
        display();
        System.out.println(s);
    }

    public static void main(String[] args) {
        A a = new B();
        // Line 1
        ((B) a).display("Ram");
    }
}