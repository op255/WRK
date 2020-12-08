# -*- mode: ruby -*-
# vi: set ft=ruby :

$hostname = "ansible-ipch"

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/bionic64"
    config.vm.network :private_network, ip: "192.168.3.54"
    config.vm.hostname = "www.#$hostname"
   # config.hostsupdater.aliases = ["#$hostname", "adminer.#$hostname"]

    config.vm.synced_folder "./src", "/var/www/#$hostname", owner: "www-data", group: "vagrant", mount_options: ['dmode=775', 'fmode=775']

    config.vm.provider "virtualbox" do |vb|
       vb.memory = "2048"
       vb.cpus = 2
    end

    config.vm.provision "ansible_local" do |ansible|
        ansible.playbook = "provisioning/playbook.yml"
        ansible.install_mode = "pip"
    end
end
