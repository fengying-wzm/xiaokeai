FROM mattrayner/lamp:latest-1604
ADD ./ /app
EXPOSE 80 3306
CMD ["/run.sh"]