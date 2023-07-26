
import java.util.Stack;

public class IsMatched {

    public static boolean isMatch(String expression) {
        final String opening = "([";
        final String closing = ")]";

        Stack<Character> buffer = new Stack<>();
        for (char c : expression.toCharArray()) {
            if (opening.indexOf(c) != -1) {
                buffer.push(c);
            } else if (closing.indexOf(c) != -1) {
                if (buffer.isEmpty()) {
                    return false;
                }
                if (closing.indexOf(c) != opening.indexOf(buffer.pop()))
                    return false;
            }
        }
        return buffer.isEmpty();
    }

    public static void main(String[] args) {
        if (isMatch("[(])")) {
            System.out.println("YES");
        }
        else {
            System.out.println("NO");
        }
        if(isMatch("(])")) {
            System.out.println("YES");
        }
        else {
            System.out.println("NO");
        }
        if (isMatch("([[]()])")){
            System.out.println("YES");
        }
        else {
            System.out.println("NO");
        }
    }
}

