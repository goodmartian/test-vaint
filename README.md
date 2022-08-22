# Test task for VA Intelligence

[Task](https://docs.google.com/document/d/1Ao0kBkibTuotZP2i3n2Wb4f69FnY4hQVrg9p3sY-OPU/edit)

## Installation

Clone the repo locally:

```sh
git clone git@github.com:goodmartian/test-vaint.git
cd test-vaint
```

Setup configuration:

```sh
cp .env.example .env
```

Run Sail containers

```sh
./vendor/bin/sail up -d
```

Install PHP dependencies:

```sh
sail composer install
```
