# Hyperledger Composer ve Fabric Kurulum Rehberi #

Merhaba, hazırsanız kuruluma başlıyoruz. 

Ana Kaynak : https://hyperledger.github.io/composer/unstable/installing/installing-index.html

Sistem öncelikle bir tool olan Composer ı, ardından framework Fabric i kurmamıza izin veriyor. Composer kurulumuna başlamadan önce **ön koşullar** sağlanmalıdır. Bu sayfada okulumuz makinelerinin çoğunun **UBUNTU 16.04** kullandığını varsayarak bu dağıtım için kurulum yapacağız.

İçerik
-----------
* [Ön Koşullar](https://github.com/MSKU-BcRG/Hyperledger_Composer_Fabric_Kurulum_Rehberi#%C3%96n-ko%C5%9Fullar)
* [Geliştirme Ortamının İndirilmesi](https://github.com/MSKU-BcRG/Hyperledger_Composer_Fabric_Kurulum_Rehberi#geli%C5%9Ftirme-ortam%C4%B1n%C4%B1n-%C4%B0ndirilmesi)
* [Hyperledger Fabric Kurulumu](https://github.com/MSKU-BcRG/Hyperledger_Composer_Fabric_Kurulum_Rehberi#hyperledger-fabric-kurulumu)
* [Geliştiriciler İçin](https://github.com/MSKU-BcRG/Hyperledger_Composer_Fabric_Kurulum_Rehberi#geli%C5%9Ftiriciler-%C4%B0%C3%A7in)
* [Composer-Rest-Server](https://github.com/MSKU-BcRG/Hyperledger_Composer_Fabric_Kurulum_Rehberi#composer-rest-server)
* [Angular-App Kurulumu](https://github.com/MSKU-BcRG/Hyperledger_Composer_Fabric_Kurulum_Rehberi#angular-app-kurulumu)
* [Composer Rest Server'a Sorgu Eklemek](https://github.com/MSKU-BcRG/Hyperledger_Composer_Fabric_Kurulum_Rehberi/blob/master/README.md#composer-rest-servera-sorgu-eklemek)

Ön Koşullar
------------------

* Ubuntu Linux 14.04 / 16.04 LTS (ikisi de 64-bit) İşletim Sistemi
* Docker Engine: 17.03 veya üzeri versiyon
* Docker-Compose:1.8 veya üzeri versiyon 
* Node: 8.9 veya üzeri versiyon (versiyon 9 desteklenmiyor)
* npm: v5.x 
* git: 2.9.x veya üzeri versiyon 
* Python: 2.7.x versiyon 
* Sevdiğiniz bir kod editörü (tercihe bağlı).

![ubuntu](https://user-images.githubusercontent.com/29989590/43631820-f22e971e-970c-11e8-81a6-c8bd245867ef.png)
source:https://www.udemy.com/hyperledger/

** sanal makinede çalışmanızı tavsiye ederim
** ileride kullanacağımız bir komut bize ön koşulları indirecek fakat makineden makineye farklı hatalar alınabiliyor. Hata düzeyini minimalize etmek için siz de ön koşulları şimdiden manuel olarak indirebilirsiniz. (örneğin` sudo apt-get install docker.io ` vb.)

Verilen komutları -sırasıyla- girin:
* `curl -O https://hyperledger.github.io/composer/unstable/prereqs-ubuntu.sh`
* `chmod u+x prereqs-ubuntu.sh`
* `./prereqs-ubuntu.sh`     //otomatik biçimde ön koşulları indirir.

" "PROGRAM_ADI" --version " komutuyla versiyonlarınızın doğru olduğundan emin olun. İşleminizden sonra `sudo apt-get update` yapabilirsiniz.

Geliştirme Ortamının İndirilmesi
---------------------------------

Sıra geliştirme ortamını indirmekte. Bileşenleri indirmek için verilen komutları -sırasıyla- girin:
** Not: npm, `su` ya da `sudo` ile kullanılamaz.

* `npm install -g composer-cli`
* `npm install -g composer-rest-server`
* `npm install -g generator-hyperledger-composer`
* `npm install -g yo`
* `npm install -g composer-playground`

** Not: Herhangi bir adımda hata ile karışalışırsanız. İleride sorun yaşamanız yüksek ihtimaldir. Bu yüzden bu adımların hepsini hatasız bir şekilde yaptığınızdan emin olunuz.

![mnb](https://user-images.githubusercontent.com/29989590/43640811-0012a844-972a-11e8-845e-94814fddd913.png)
Tekli Organizasyon 
source:https://www.udemy.com/hyperledger/

** Not: Hata ile karşılaşmanız durumunda, tekrar kurmayı deneyiniz. Hata devam ediyorsa :
* `rm -rvf /usr/local/lib/node_modules`
çalıştırdıktan sonra, bilgisayarınızı açıp tekrar deneyiniz. Yalnız dikkatli olunuz, node modullerini kullanan başka bir uygulamanız varsa etkilenebilir.


Hyperledger Fabric Kurulumu
------------------------------

* `mkdir ~/fabric-dev-servers && cd ~/fabric-dev-servers` //**fabric-dev-servers** klasörü açıp içine giriyoruz. Bu klasör ana klasörümüz oldu.
* `curl -O https://raw.githubusercontent.com/hyperledger/composer-tools/master/packages/fabric-dev-servers/fabric-dev-servers.tar.gz`
* `tar -xvf fabric-dev-servers.tar.gz`
* `./downloadFabric.sh` // Fabric kurulumu burada başlıyor.
* **~/fabric-dev-servers** klasörü içerisinde olduğunuzdan emin olarak `./startFabric.sh `komutunu girin. Bu aşamada eksik bir kurulum yaptıysanız hata alabilirsiniz, çözüm için issue lara bakınız.
* `composer-playground`  // Bu komut sizi *8080* portunda lokal tarayıcınıza bağlayacaktır. Playground u lokal olarak kullanabilirsiniz.

![playground](https://user-images.githubusercontent.com/29989590/42679442-9f277a78-868a-11e8-89de-7df184ef5fe2.png)

** Bu aşamada aldığınız ve çözümünü bulamadığınız herhangi bir hata için, kurulumu kaldırıp yenilemeyi deneyebilirsiniz, bakınız : https://hyperledger.github.io/composer/unstable/installing/development-tools.html

Geliştiriciler İçin
----------------------

Artık geliştiriciler için olan kısma gelmiş bulunuyoruz. cd komutu ile **~/fabric-dev-servers** içinde bulunduğunuzdan emin olduktan sonra, ` yo hyperledger-composer:businessnetwork ` komutunu girin. Ağ adına **tutorial-network** diyebilirsiniz.
** Verilen ağ adları, kart adları gibi değerlerin kolaylık sağlaması açısından **aynı girilmesi** tavsiye ediliyor, aksi halde her komutu kendi network, kart, klasör adınıza göre düzenlemek zorunda kalabilirsiniz.

* Editör açıklaması, ismi, emaili kısımlarını serbestçe doldurabilirsiniz.
* Lisans için **Apache-2.0** ı seçin.
* Ağ adınızı **org.example.mynetwork** olarak girin.
* Boş bir ağ oluşturup oluşturmamak konusunda ne istediğinizi sorduğunda **hayır(n)** seçin.
// Böylece iş ağınızın yapısını oluşturdunuz.

İş ağı tanımlamak için verilen adımları uygulayın:

* **~/fabric-dev-servers/tutorial-network/models** içerisinden " **org.example.mynetwork.cto** " dosyasının içeriğinin tamamını silip yerine repo **Kurulum** da verilen dosyayı yapıştırın, kaydedin.
* **~/fabric-dev-servers/tutorial-network/lib** içerisindeki " **logic.js** " dosyasının içeriğinin tamamını silip yerine repo **Kurulum** da verilen dosyayı yapıştırın, kaydedin.
* **~/fabric-dev-servers/tutorial-network** içerisindeki " **permissions.acl** " dosyasının içeriğinin tamamını silip yerine repo **Kurulum** da verilen dosyayı yapıştırın, kaydedin.

İş ağını dağıtmak için verilen adımları uygulayın:

* **~/fabric-dev-servers/tutorial-network** içinde olduğunuzdan emin olarak `composer archive create -t dir -n . `komutunu girin. Bu durumda sonu **@0.0.1.bna** ile biten zip, klasörünüzün içerisinde olmalı.
* cd .. ile çıkarak **~/fabric-dev-servers** klasörüne geri dönüyoruz. Burada ` ./createPeerAdminCard.sh `komutunu giriyoruz.
* Ardından **tutorial-network** e cd ile girerek ` composer network install --card PeerAdmin@hlfv1 --archiveFile tutorial-network@0.0.1.bna ` komutunu giriyoruz ve sırasıyla devam ediyoruz:
* `composer network start --networkName tutorial-network --networkVersion 0.0.1 --networkAdmin admin --networkAdminEnrollSecret adminpw --card PeerAdmin@hlfv1 --file networkadmin.card`
* `composer card import --file networkadmin.card`
* `composer network ping --card admin@tutorial-network`  // komutlarını giriyoruz. Bu komutlarla iş ağımızı dağıtmış olduk.

Composer-Rest-Server
--------------------------

**~/fabric-dev-servers/tutorial-network** içerisinden ` composer-rest-server `komutunu girince açılan kısma aşağıda verilen değerleri giriniz:
* Kart adı olarak: **admin@tutorial-network**
* **Never use Namespaces**
* Generated API: **No** ; TLS Security: **No** ; Event Publication: **Yes**
// Böylelikle API yi iş ağına ve blok zincirine bağlamış olduk.

![rest](https://user-images.githubusercontent.com/29989590/42679402-78852758-868a-11e8-8d09-9ab434040fb2.png)

Angular-App Kurulumu
-----------------------

Bir Angular 4 uygulaması edinebilmek için **~/fabric-dev-servers/tutorial-network** içerisinden ` yo hyperledger-composer:angular` komutunu giriniz.

* Çalışan iş ağına bağlanmak istediğinizi sorduğunda cevabı **Evet(y)** olarak girin.
* Proje adı, açıklama, editör adı, emaili serbestçe girebilirsiniz.
* Business Network Kart sorduğunda **admin@tutorial-network** ü giriniz.
* **Connect to an existing REST API** seçeneğini seçiniz.
* REST Server adresi olarak **http://localhost** ; sunucu portu olarak ise **3000** i girin.
* **Namespaces are not used** seçeneğini işaretleyin.

Uygulamayı başlatmak için **~/fabric-dev-servers/tutorial-network/angular-app** dizinine girin. Ardından `npm start` dediğinizde uygulama yüklenecek ve **4200** portuna bağlanacaktır.

![angular](https://user-images.githubusercontent.com/29989590/42679936-3a54a0ba-868c-11e8-949d-a35f559621d1.png)

** Eğer lokal bağlantıları tarayıcınız açmazsa işe yarayabilecek portlar:
REST-Server-API : **3000**, 
Angular-App : **4200**, 
Composer-Playground : **8080**

** Eğer lokalde çalışıyorsanız, yaptığınız değişiklikler **kaydedilmeyecek** ve uygulamayı her seferinde yeniden başlatacaksınız. Bunun için bir sunucuya bağlanmanızı tavsiye ediyoruz. Angular-App veya Composer-Playground u başlatmak için baştaki koşullar geçerliyken (Angular için `npm start` ve Playground için `composer-playground`) Composer-Rest-Server a her seferinde iş ağı tanımlamak istemiyorsanız, geçerli komutu **~/fabric-dev-servers/tutorial-network** içerisindeyken girin `composer-rest-server -c admin@tutorial-network -n never -w true`

Composer Rest Server'a Sorgu Eklemek
------------------------------------------

Sorgular ekleyebilmek için ilk olarak iş ağımızı güncellemeliyiz:
* **~/fabric-dev-servers/tutorial-network/models** içerisinden " **org.example.mynetwork.cto** " dosyasının içeriğine(sonuna), repo **Sorgu** da verilen kodları **ekleyin**, kaydedin.
* **~/fabric-dev-servers/tutorial-network/lib** içerisindeki " **logic.js** " dosyasının içeriğinin tamamını silip yerine repo **Sorgu** da verilen dosyayı yapıştırın, kaydedin.
* **~/fabric-dev-servers/tutorial-network** içerisinde iken " **queries.qry** " adında boş bir belge oluşturun. İçeriğine, repo **Sorgu** da verilen dosyayı yapıştırın, kaydedin.

Ardından iş ağının versiyonunu değiştireceğiz. Bunun için **~/fabric-dev-servers/tutorial-network** içerisine girin, **package.json** dosyasını açın ve "0.0.1" olan versiyon özelliğini "0.0.2" olarak değiştirin, kaydedin. 

![versiyon](https://user-images.githubusercontent.com/29989590/42807685-1f35e6c8-89ba-11e8-85cf-4b0c58b95258.png)

**tutorial-network** içerisinde olduğunuzdan eminseniz `composer archive create --sourceType dir --sourceName . -a tutorial-network@0.0.2.bna` komutunu çalıştırın. Bu komuttan sonra klasörünüze " tutorial-network@0.0.2.bna " adında bir dosya gelmiş olmalı.

Versiyonunu yükselttiğimiz iş ağımıza, yapılan değişiklikleri adapte etmeliyiz. Bunun için " tutorial-network@0.0.2.bna " dosyasının bulunduğu klasöre giderek aşağıda verilen komutları -sırasıyla- çalıştırın:

* `composer network install --card PeerAdmin@hlfv1 --archiveFile tutorial-network@0.0.2.bna`
* `composer network upgrade -c PeerAdmin@hlfv1 -n tutorial-network -V 0.0.2`
* `composer network ping -c admin@tutorial-network | grep Business` //burada size versiyonu tanımlayacaktır.

Yenilenmiş Composer-Rest-Server kullanıma hazır. Şimdi cd ile **~/fabric-dev-servers/tutorial-network** içine girin ve `composer-rest-server` ı çalıştırın.

* Kart adı olarak: **admin@tutorial-network**
* **Never use Namespaces**
* Generated API: **No** ; TLS Security: **No** ; Event Publication: **Yes**
// Böylelikle yeni versiyona kartımızı tanımlatmış olduk.

Kartı yeniden tanımladığınızda, sistem sizi **localhost** port **3000** ile yönlendirecek.

** Bu noktada, **eski versiyon Composer-Rest-Server** ın başka bir terminalde **açık olmadığından, kapalı olduğundan** emin olun. Eski ve yeni sürümler aynı portta -3000- çalışmak istediği için hata alabilirsiniz.
** Ayrıca **Eduroam** ağında kartın yeni versiyonunu indirmek isterseniz hata alabilirsiniz. Çözüm ve önerilere ilişkin Error Handling Issue ya bakabilirsiniz.
** Ayrıntılı bilgi için bknz: https://hyperledger.github.io/composer/latest/tutorials/queries
