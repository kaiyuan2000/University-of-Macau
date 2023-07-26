public class SummationPuzzle {

    public static void solve(String values) {
        String firstNumber = "", secondNumber = "", resultNumber = "";

        firstNumber += values.charAt(2); //c//
        firstNumber += values.charAt(1); //b//
        firstNumber += values.charAt(1); //b//
        secondNumber += values.charAt(1); //b//
        secondNumber += values.charAt(0); //a//
        resultNumber += values.charAt(0); //a//
        resultNumber += values.charAt(1); //b//
        resultNumber += values.charAt(2); //c//

        int first = Integer.parseInt(firstNumber);
        int second = Integer.parseInt(secondNumber);
        int result = Integer.parseInt(resultNumber);


        if(first + second == result) {

            System.out.println("a : " + values.charAt(0) + " b : " + values.charAt(1) + " c : " + values.charAt(2));
        }
    }

    public static void solvePuzzle(String values, String possibleValues) {
        if(values.length() == 0) {
            solve(possibleValues);
            return;
        }
        for (int i = 0; i < values.length(); i++) {

            char ch = values.charAt(i);

            String remaining = values.substring(0, i) + values.substring(i + 1);

            solvePuzzle(remaining, possibleValues + ch);
        }
    }

    public static void main(String[] args) {
        solvePuzzle("789", "");
    }

}