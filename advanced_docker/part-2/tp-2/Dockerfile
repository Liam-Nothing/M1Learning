# # Étape de test
# FROM rust:1.55 as tester
# WORKDIR /app
# COPY . .
# RUN cargo test -- --nocapture

# # Étape de build
# FROM rust:1.55 as builder
# WORKDIR /app
# COPY . .
# RUN cargo build --release

# # Étape finale
# FROM debian:buster-slim
# COPY --from=builder /usr/src/app/target/release/tp-2 /usr/local/bin/
# CMD ["tp-2"]

# Stage 1: Tester
FROM rust:slim-buster AS tester
WORKDIR /app
COPY Cargo.toml ./
COPY src/ ./src/
RUN apt-get update && apt-get install -y \
    libssl-dev \
    pkg-config \
    musl-tools
RUN rustup target add x86_64-unknown-linux-musl
RUN cargo test --target x86_64-unknown-linux-musl

# Stage 2: Build
FROM rust:slim-buster AS build
WORKDIR /app
COPY --from=test /app/ ./
RUN rustup target add x86_64-unknown-linux-musl
RUN cargo build --release --target x86_64-unknown-linux-musl

# Stage 3: Final Image
FROM scratch
COPY --from=build /app/target/x86_64-unknown-linux-musl/release/tp_2 /tp_2
CMD ["/tp_2"]