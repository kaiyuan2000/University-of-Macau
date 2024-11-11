import matplotlib.pyplot as plt
import csv
from PIL import Image
import numpy as np
from sklearn.metrics import accuracy_score

def readTrafficSigns(rootpath):
    '''Reads traffic sign data 
    Arguments: path to the traffic sign data, for example './TrafficSignData/Test'
    Returns:   list of images, list of corresponding labels'''
    images = [] # images
    labels = [] # corresponding labels
    prefix = rootpath + '/' # subdirectory for test
    gtFile = open(prefix + 'test'+'.csv') # annotations file
    gtReader = csv.reader(gtFile, delimiter=';') # csv parser for annotations file
    #gtReader.next() # skip header
    next(gtReader)
    # loop over all images in current annotations file
    for row in gtReader:
        img=Image.open(prefix + row[0])  # the 1th column is the filename
        # preprocesing image, make sure the images are in the same size
        img=img.crop((int(row[3]),int(row[4]),int(row[5]),int(row[6])))
        img=img.resize((32,32), Image.BICUBIC)
        img=np.array(img)
        images.append(img) 
        labels.append(row[7]) # the 8th column is the label
    gtFile.close()
    return images, labels

# load the images
testImages, testLabels = readTrafficSigns('.') #test image in current directory
# print number of historical images
print('number of test data=', len(testLabels))
# show one sample image
plt.imshow(testImages[0])
plt.show()

# design the input and output for model
X=[]
Y=[]
for i in range(0,len(testLabels)):
    # input X just the flattern image, you can design other features to represent a image
    X.append(testImages[i].flatten())
    Y.append(int(testLabels[i]))
X=np.array(X)
Y=np.array(Y)


#load a Randomforest
import pickle
clf= pickle.load(open('model.sav', 'rb'))
Ypred=clf.predict(X)

#check the accuracy
accuracy_score(Y,Ypred)





