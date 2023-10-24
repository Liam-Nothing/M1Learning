FROM rust:slim-buster AS build
WORKDIR /app
COPY Cargo.toml ./
COPY src/ ./src/
RUN rustup target add x86_64-unknown-linux-musl
RUN cargo build --release --target x86_64-unknown-linux-musl
FROM scratch
COPY --from=build /app/target/x86_64-unknown-linux-musl/release/rust-example /rust-example