img = imread("Trump.jpeg");

gpyramid = Gpyramid(img,1);
lpyramid = Lpyramid(img,5);

for k = 1 : length(gpyramid)
    imshow(cell2mat(gpyramid(k)))
    pause; % press a button to continue
end

for k = 1 : length(lpyramid)
    imshow(cell2mat(lpyramid(k)))
    pause; % press a button to continue
end