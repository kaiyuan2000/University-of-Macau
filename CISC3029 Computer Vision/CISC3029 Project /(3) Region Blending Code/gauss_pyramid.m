function [pyramid] = gauss_pyramid(img,levels)

    pyramid = cell(1,levels+1);
    pyramid{1} = img;
    subsample =img;
    for i =2 :levels+1
        subsample = reduce(subsample);
        pyramid{i} = subsample;
    end

end