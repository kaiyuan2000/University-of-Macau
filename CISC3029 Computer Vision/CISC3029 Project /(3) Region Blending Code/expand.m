function [expout] = expand(im)
    rows = size(im,1);
    cols = size(im,2);
    expout = zeros([2*rows 2*cols 3]);

    expout(1:2:2*rows,1:2:2*cols,:) = im;

    ker = fspecial('gaussian',5,1);
    expout = imfilter(expout,ker,"conv");
    expout = 4*expout;
end