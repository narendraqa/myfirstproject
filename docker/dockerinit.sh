sudo docker stop mywebserver
sudo docker rm mywebserver
sudo docker rmi myphpimage
sudo docker build -t myphpimage /home/pits/docker/docker/. 
sudo docker run --name mywebserver -p 80:80 myphpimage
myip="$(dig +short myip.opendns.com @resolver1.opendns.com)"
echo "Site URL: http://${myip}"
