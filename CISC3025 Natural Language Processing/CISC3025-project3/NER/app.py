from flask import Flask, render_template, request
from MEM import MEMM

app = Flask(__name__)

# Initialize the classifier and load the model only once to optimize performance
classifier = MEMM()
classifier.load_model()

@app.route("/", methods=['GET', 'POST'])
def webpage():
    results = []
    if request.method == 'POST':
        string = request.form.get("input")
        if string:  # Ensure there is an input to process
            result_pairs = classifier.predict_sentence(string)
            # Process the result to format it appropriately for the HTML template
            results = [(result_pairs[i], result_pairs[i+1]) for i in range(0, len(result_pairs), 2)]
    return render_template("NLP-group-project.html", results=results)

if __name__ == "__main__":
    app.run(debug=True, port=5001)
