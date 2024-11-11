img2 = im2double(imread('newyork.jpg'));
img1 = im2double(imread('elon.jpg'));

img1 = imresize(img1,[1024 1024]);
img2 = imresize(img2,[1024 1024]);

figure(1);imagesc(img1);colormap(gray);axis off;
h = imfreehand( gca ); setColor(h,'blue');
mask2D = createMask(h);
mask = double(repmat(mask2D,1,1,3));

directBlendimg = mask2D.*img1+(1-mask2D).*img2;

level = 4

gauss_pyr_mask = gauss_pyramid(mask,level);
gauss_pyr_img1 = gauss_pyramid(img1,level);
gauss_pyr_img2 = gauss_pyramid(img2,level);

lapl_pyr_img1 = lapl_pyramid(gauss_pyr_img1);
lapl_pyr_img2 = lapl_pyramid(gauss_pyr_img2);

blended_pyr_img = cell(1,length(lapl_pyr_img2));
for i = 1 : length(lapl_pyr_img2)
    white_Img = lapl_pyr_img2{i};
    black_Img = lapl_pyr_img1{i};
    mask_Pyr = gauss_pyr_mask{i};

    blended_pyr_img{i} = gauss_pyr_mask{i}.*lapl_pyr_img1{i} + (1-gauss_pyr_mask{i}).*lapl_pyr_img2{i};
end

for i = length(blended_pyr_img) : -1 :2
    tmp = expand(blended_pyr_img{i});
    rows = size(blended_pyr_img{i-1},1);
    cols = size(blended_pyr_img{i-1},2);
    tmp = tmp(1:rows,1:cols,:);
    blended_pyr_img{i-1} = blended_pyr_img{i-1} + tmp;
end

outpyr_image = blended_pyr_img{1}

figure;
imshow(img1);title("first image")
figure; imshow(img2);title("second image")
figure; imshow(mask);title("mask image")
figure; imshow(directBlendimg);title("direct blend")
figure; imshow(outpyr_image);title("final output")
