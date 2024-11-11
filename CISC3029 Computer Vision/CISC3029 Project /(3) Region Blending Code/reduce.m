function [img_Out] = reduce(img)

    kernel = fspecial('gaussian',5,1);
    img_blur = imfilter(img,kernel,'conv');
    img_Out = img_blur(1:2:end,1:2:end,:);
end