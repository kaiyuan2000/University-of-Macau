class Account {
    private int accountNum ;
    private double balance;
    //constructor
    public Account(int number) {
        this (number, 0);
    }
    public Account (int number, double amount){
        accountNum = number;
        balance = amount;
    }
    //methods
    public int getAccountNum() {
        return accountNum ;
    }
    public double getBalance() {
        return balance ;
    }
    public void deposit (double amount){
        balance = balance + amount;
        System.out.println("Deposit successful, balance is : "+ balance);
    }
    public void withdraw (double amount) {
        if (amount > balance) {
            System.out.println("Insufficient balance");
        }
        else { balance = balance - amount ;
            System.out.println("Withdraw successfuly, remainding balance is :" + balance );}
    }


}
public class AccountDemo extends Account {

    //Constructor
    public AccountDemo (int number){ this(number,0);}
    public AccountDemo (int number, double amount) {
        super(number,amount);
    }

    public static void main (String[] args){
        //create new account
        AccountDemo Kai = new AccountDemo(101010,500.50);
        //get account number
        int accountNum = Kai.getAccountNum();
        System.out.println("Account number is : "+ accountNum);
        //deposit 1000
        Kai.deposit(1000);
        //withdraw 1000
        Kai.withdraw(1000);
        //get balance
        double balance = Kai.getBalance();
        System.out.println("The balance is : "+ balance);
    }
}
