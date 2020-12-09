# SSL/TLS Certificate

Generated with Java tool called `keytool`, you can find it in Java's `\bin\` directory - you need to have Java installed. Download Java from [here](https://www.java.com/en/download/).

Generated with Java v8 update 261 on Windows 10 Enterprise OS (64-bit).

Open the Command Prompt and run the commands shown below.

If `%JAVA_HOME%` environment variable is not set, manually enter a full path to Java's `\bin\` directory.

Generate a private key (do not share it with anyone):

```fundamental
"%JAVA_HOME%\bin\keytool" -genkeypair -keyalg RSA -alias "sws" -storetype PKCS12 -keystore "sws.key" -storepass "securewebsite" -validity 365 -keysize 2048
```

Generate a certificate from the private key:

```fundamental
"%JAVA_HOME%\bin\keytool" -exportcert -rfc -alias "sws" -file "sws.crt" -keystore "sws.key" -storepass "securewebsite"
```

Generate a certificate signing request (if you want to register your certificate to Certificate Authority):

```fundamental
"%JAVA_HOME%\bin\keytool" -certreq -alias "sws" -file "sws.csr" -keystore "sws.key" -storepass "securewebsite"
```

## [Optional] Generate a PEM Format SSL/TLS Certificate

Generate a PEM format certificate:

```fundamental
openssl pkcs12 -in "sws.key" -nocerts -out "sws_key.pem" -passin "pass:securewebsite" -passout "pass:securewebsite"

openssl pkcs12 -in "sws.key" -nokeys -out "sws_crt.pem" -passin "pass:securewebsite"
```

Generated with OpenSSL v1.1.1g on Windows 10 Enterprise OS (64-bit).

Download OpenSSL from [here](https://slproweb.com/products/Win32OpenSSL.html).

To use this tool, you need to manually navigate to OpenSSL's `\bin\` directory or enter its full path.

## [Additional] Generate an RSA Public and Private Key Pair

Generate an RSA private key (do not share it with anyone):

```fundamental
openssl genrsa -aes-256-cbc -out "rsa_private_key.pem" -passout "pass:secret" 2048
```

Generate an RSA public key from the private key:

```fundamental
openssl rsa -in "rsa_private_key.pem" -passin "pass:secret" -out "rsa_public_key.pem" -pubout
```

## [Additional] Sign a Java Archive (JAR) File

Generate an RSA private key (do not share it with anyone):

```fundamental
keytool -genkey -keyalg RSA -alias "jar" -storetype PKCS12 -keystore "jar_private.key" -storepass "secret" -validity 365 -keysize 2048
```

Sign a JAR file:

```fundamental
jarsigner -sigalg SHA1withRSA -digestalg SHA1 -tsa http://timestamp.digicert.com -keystore "jar_private.key" -storepass "secret" "file.jar" "jar"
```
