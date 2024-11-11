img2 = imread('dog.bmp')
img1 = imread('cat.bmp')

laplacian = Lpyramid(img1,20)
im1 = (cell2mat(laplacian(1)))
im1 = im2uint8(im1)

gaussian = Gpyramid(img2,5)
im2 = (cell2mat(gaussian(1)))
im2 = im2uint8(im2)
%manually blur because 1st image of gaussian pyramid is original image
im2 = imgaussfilt(im2,5)

final = imadd(im1,im2)
figure,imshow(final)












