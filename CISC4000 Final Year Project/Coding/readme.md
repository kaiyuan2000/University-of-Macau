# Stock Trading using Reinforcement Learning

This project leverages reinforcement learning to enhance stock trading strategies by integrating feature enhancement and reward shaping.

## Description of Scripts

### Data Preprocessing
- **`data_preprocessing.ipynb`**
  - Loads and preprocesses data by normalizing price columns and splitting into training and testing sets.

### Model Training
- **`train_model.ipynb`**
  - Sets up and trains the PPO model on the processed training data.

### Model Evaluation
- **`evaluate_model.ipynb`**
  - Evaluates the trained model using metrics such as Sharpe ratio, max drawdown, total reward, and total profit.

### Methodology
- **`methodology.ipynb`**
  - Defines the various feature engineering and reward shaping methods used in the trading environment.

### Utilities
- **`utils.ipynb`**
  - Contains utility functions for calculating buy and hold performance and downloading historical stock data.

### Main Script
- **`main.ipynb`**
  - Orchestrates the workflow by running data preprocessing, methodology, model training, evaluation, and utility functions.

## Setup Instructions

### Installation

1. Clone the repository to your local machine
2. You can try out different feature function and reward function at main.ipynb 
3. The run process is from data preprocess, defining reward & feature function, model training, and evaluate the model.

## Project Details

### Data
Data is sourced from Yahoo Finance and consists of historical data for various stocks. 0.95 will used for training while 0.05 used for testing.

### Methodology 
Feature engineering involves adding technical indicators and candlestick patterns.
Reward shaping strategies are designed to optimize the trading agent's performance.

### Model
The model is trained using the Proximal Policy Optimization (PPO) algorithm.

### Evaluation
The performance of the model is evaluated using key financial metrics such as Sharpe ratio and max drawdown.