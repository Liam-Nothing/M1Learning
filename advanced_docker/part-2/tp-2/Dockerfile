# Étape de test
FROM rust:1.55 as tester
WORKDIR /app
COPY . .
RUN cargo test -- --nocapture

# Étape de build
FROM rust:1.55 as builder
WORKDIR /app
COPY . .
RUN cargo build --release

# Étape finale
FROM debian:buster-slim
COPY --from=builder /usr/src/app/target/release/tp-2 /usr/local/bin/
CMD ["tp-2"]
