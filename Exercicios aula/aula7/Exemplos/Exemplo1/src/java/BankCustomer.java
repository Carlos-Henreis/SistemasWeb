
public class BankCustomer {

    private String id, firstName, lastName;
    private double balance;

    public BankCustomer(String id, String firstName, String lastName, double balance) {
        this.id = id;
        this.firstName = firstName;
        this.lastName = lastName;
        this.balance = balance;
    }

    public String getId() {
        return id;
    }

    public String getFirstName() {
        return (firstName);
    }

    public String getLastName() {
        return (lastName);
    }

    public double getBalance() {
        return (balance);
    }

    public double getBalanceNoSign() {
        return (Math.abs(balance));
    }
}
