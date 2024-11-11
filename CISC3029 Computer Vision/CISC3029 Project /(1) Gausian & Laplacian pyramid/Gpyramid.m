function [pyramid] = Gpyramid(G0,sigma)

%gaussian pyramid
blur0 = imgaussfilt(G0,sigma)
G1 = imresize(blur0,1/2)

blur1 = imgaussfilt(G1,sigma)
G2 = imresize(blur1,1/2)

blur2 = imgaussfilt(G2,sigma)
G3 = imresize(blur2,1/2)

blur3 = imgaussfilt(G3,sigma)
G4 = imresize(blur3,1/2)

pyramid = {G0,G1,G2,G3,G4} 
% 
% for k = 1 : length(pyramid)
%     imshow(cell2mat(pyramid(k)))
%     pause; % press a button to continue
% end
%imshow(cell2mat(pyramid(3)))
end