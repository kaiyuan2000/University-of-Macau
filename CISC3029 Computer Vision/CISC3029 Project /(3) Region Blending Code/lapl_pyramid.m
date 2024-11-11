function [pyramid] = lapl_pyramid(gauss_pyr)
    pyramid = cell(1,length(gauss_pyr));
    for i = 1:length(gauss_pyr)-1
        tmp = expand(gauss_pyr{i+1});
        rows = size(gauss_pyr{i},1);
        cols = size(gauss_pyr{i},2);
        tmp = tmp(1:rows,1:cols,:);

        pyramid{i} = gauss_pyr{i} - tmp;
    end

    pyramid{end} = gauss_pyr{end};
end