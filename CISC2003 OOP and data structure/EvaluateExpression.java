
import java.util.Stack;

public class EvaluateExpression
{
        public static int evaluate(String expression)
        {
            char[] tokens = expression.toCharArray();

            Stack<Integer> valStk = new Stack<Integer>();
            Stack<Character> opStk = new Stack<Character>();

            for (int i = 0; i < tokens.length; i++)
            {
                if (tokens[i] == ' ') continue;

                if (tokens[i] >= '0' && tokens[i] <= '9')
                {
                    StringBuffer sb = new StringBuffer();
                    while (i < tokens.length && tokens[i] >= '0' && tokens[i] <= '9')
                        sb.append(tokens[i++]);
                    valStk.push(Integer.parseInt(sb.toString()));
                    i--;
                }

                else if (tokens[i] == '(')
                    opStk.push(tokens[i]);

                else if (tokens[i] == ')')
                {
                    while (opStk.peek() != '(')
                        valStk.push(applyOp(opStk.pop(), valStk.pop(), valStk.pop()));
                    opStk.pop();
                }

                else if (tokens[i] == '+' || tokens[i] == '-' || tokens[i] == '*' || tokens[i] == '/')
                {
                    while (!opStk.empty() && hasPrecedence(tokens[i], opStk.peek()))
                        valStk.push(applyOp(opStk.pop(), valStk.pop(), valStk.pop()));

                    opStk.push(tokens[i]);
                }
            }

            while (!opStk.empty())
                valStk.push(applyOp(opStk.pop(), valStk.pop(), valStk.pop()));
            return valStk.pop();
        }

        public static boolean hasPrecedence(
                char op1, char op2)
        {
            if (op2 == '(' || op2 == ')')
                return false;
            if ((op1 == '*' || op1 == '/') &&
                    (op2 == '+' || op2 == '-'))
                return false;
            else
                return true;
        }


        public static int applyOp(char op, int b, int a)
        {
            switch (op)
            {
                case '+':
                    return a + b;
                case '-':
                    return a - b;
                case '*':
                    return a * b;
                case '/':
                    if (b == 0)
                        throw new
                                UnsupportedOperationException(
                                "Cannot divide by zero");
                    return a / b;
            }
            return 0;
        }

        public static void main(String[] args)
        {
            System.out.println(EvaluateExpression.
                    evaluate("15 + 24 * 3"));
            System.out.println(EvaluateExpression.
                    evaluate("80 * 5 + 4"));
            System.out.println(EvaluateExpression.
                    evaluate("100 * ( 2 + 12 )"));
            System.out.println(EvaluateExpression.
                    evaluate("100 * ( 2 + 12 ) / 14"));
        }
    }


