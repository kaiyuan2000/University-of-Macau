img2 = imread('far1.png')
img1 = imread('close1.png')

laplacian = Lpyramid(img1,5)
im1 = (cell2mat(laplacian(1)))
im1 = im2uint8(im1)

gaussian = Gpyramid(img2,5)
im2 = (cell2mat(gaussian(1)))
im2 = im2uint8(im2)
%manually blur because 1st image of gaussian pyramid is original image
im2 = imgaussfilt(im2,20)

final = imadd(im1,im2)
figure,imshow(final)











