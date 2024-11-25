DROP DATABASE ecomdb;

CREATE DATABASE ecomdb;

USE ecomdb;

CREATE TABLE produtos(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(255),
	descr VARCHAR(255),
	valor DECIMAL(5, 2),
	imagem VARCHAR(255)
);

INSERT INTO produtos (nome, descr, valor, imagem) VALUES
('Arduino Uno', 'Placa de desenvolvimento baseada em ATmega328P', 120.50, 'https://cdn-reichelt.de/bilder/web/xxl_ws/B300/ARDUINO_UNO_A06.png'),
('Raspberry Pi 4', 'Computador de placa única com 4GB de RAM', 450.00, 'https://www.cnx-software.com/wp-content/uploads/2019/06/Raspberry-Pi-4-Model-B-Large.jpg'),
('Transistor BC547', 'Transistor NPN para amplificação e comutação', 0.50, 'https://www.phippselectronics.com/wp-content/uploads/2020/06/PHI1052047-BC547-45V-100mA-NPN-Transistor-Pack-of-100.jpg'),
('Capacitor Eletrolítico 100uF', 'Capacitor para circuitos de filtragem', 0.30, 'https://geekelectronics.io/wp-content/uploads/2017/09/100UF-A.jpg'),
('Resistor 10k Ohms', 'Resistor de carbono 1/4W para controle de corrente', 0.10, 'https://www.flyrobo.in/image/cache/catalog/Resistor/10k-ohm-resistor-1024x1024.png'),
('Módulo Sensor de Temperatura DHT11', 'Sensor de temperatura e umidade digital', 15.00, 'https://www.e-ika.com/images/thumbs/0013124_modulo-sensor-de-temperatura-y-humedad-dht11.jpeg'),
('Display LCD 16x2', 'Display com backlight azul e conexão I2C', 25.50, 'https://http2.mlstatic.com/display-lcd-16x2-1602a-para-arduino-pic-D_NQ_NP_999170-MLM31223936158_062019-F.jpg'),
('Protoboard 830 pontos', 'Placa de ensaio para montagem de circuitos', 20.00, 'https://www.vidadesilicio.com.br/media/catalog/product/p/r/protoboard_830_1.jpg'),
('Kit de Cabos Jumper', 'Conjunto de cabos para conexões em protoboard', 10.00, 'https://http2.mlstatic.com/D_NQ_NP_2X_607070-MLB31045444681_062019-F.jpg'),
('Módulo Relé 5V', 'Módulo para acionamento de dispositivos de alta potência', 8.00, 'https://www.makercreativo.com/store/wp-content/uploads/2017/07/Modulo-rele-1-canal-5v-1.jpg'),
('Sensor de Movimento PIR', 'Sensor para detecção de movimento infravermelho', 12.50, 'https://images.tcdn.com.br/img/img_prod/557243/sensor_de_movimento_e_presenca_pir_hc_sr501_120_1_20191212201831.png'),
('Módulo Bluetooth HC-05', 'Módulo para comunicação sem fio via Bluetooth', 30.00, 'https://www.easyelectronics.in/image/cache/catalog/Products/HC-05-1-1000x1000.jpg'),
('Fonte de Alimentação 5V 2A', 'Fonte de alimentação para placas de desenvolvimento', 18.00, 'https://static3.tcdn.com.br/img/img_prod/648216/fonte_de_alimentacao_5v_2a_plug_p4_180o_positivo_interno_zx_10807_1_20201026201733.jpeg');



