FROM rust:slim-buster AS build
WORKDIR /app
COPY Cargo.toml ./
COPY src/ ./src/
ENV OPENSSL_DIR=/usr
RUN apt-get update && apt-get install -y \
libssl-dev \
pkg-config \
musl-tools
RUN rustup target add x86_64-unknown-linux-musl
RUN cargo build --release --target x86_64-unknown-linux-musl
FROM scratch
COPY --from=build /app/target/x86_64-unknown-linux-musl/release/rust-weather /rust-weather