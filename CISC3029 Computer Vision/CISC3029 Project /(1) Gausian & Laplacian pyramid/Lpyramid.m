function [pyramid] = Lpyramid(G0,sigma)

%gaussian pyramid
blur0 = imgaussfilt(G0,sigma)
L0 = imsubtract(G0,blur0)

G1 = imresize(blur0,1/2)
blur1 = imgaussfilt(G1,sigma)
L1 = imsubtract(G1,blur1)

G2 = imresize(blur1,1/2)
blur2 = imgaussfilt(G2,sigma)
L2 = imsubtract(G2,blur2)

G3 = imresize(blur2,1/2)
blur3 = imgaussfilt(G3,sigma)
L3 = imsubtract(G3,blur3)

G4 = imresize(blur3,1/2)
blur4 = imgaussfilt(G4,sigma)
L4 = imsubtract(G4,blur4)

pyramid = {L0,L1,L2,L3,L4} 

% for k = 1 : length(Lpyramid)
%     imshow(cell2mat(Lpyramid(k)))
%     pause; % press a button to continue
% end

end

