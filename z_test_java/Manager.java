public class Employee {
    public void display() {
        System.out.print("In Employee class");
    }
}

public class TeamLead extends Employee {
    public void display() {
        System.out.println("In TeamLead class");
    }
}

public class Manager extends Employee {

    public void display() {
        System.out.println("In Manager class");
    }

    public static void main(String[] arg) {
        TeamLead t = new TeamLead();
    }
}
